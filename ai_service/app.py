from fastapi import FastAPI
from transformers import (
    CLIPProcessor,
    CLIPModel,
    AutoTokenizer,
    AutoModelForSequenceClassification
)
from PIL import Image
import torch

app = FastAPI()

clip_model_name = "openai/clip-vit-base-patch32"

clip_processor = CLIPProcessor.from_pretrained(
    clip_model_name
)

clip_model = CLIPModel.from_pretrained(
    clip_model_name
)

indobert_model_name = (
    "w11wo/indonesian-roberta-base-sentiment-classifier"
)

tokenizer = AutoTokenizer.from_pretrained(
    indobert_model_name
)

indobert_model = (
    AutoModelForSequenceClassification.from_pretrained(
        indobert_model_name
    )
)

@app.post("/sentiment")
def sentiment(data: dict):

    caption = data["caption"]

    inputs = tokenizer(
        caption,
        return_tensors="pt",
        truncation=True,
        padding=True
    )

    with torch.no_grad():

        outputs = indobert_model(**inputs)

        probs = torch.softmax(
            outputs.logits,
            dim=1
        )

    prediction = torch.argmax(
        probs,
        dim=1
    ).item()

    confidence = probs[0][prediction].item()

    label = indobert_model.config.id2label[
        prediction
    ].lower()

    return {
        "sentiment": label,
        "score": round(confidence, 4)
    }

@app.post("/clip")
def clip_match(data: dict):

    try:

        image = Image.open(
            data["image_path"]
        ).convert("RGB")

        caption = data["caption"]

        inputs = clip_processor(
            text=[caption],
            images=image,
            return_tensors="pt",
            padding=True
        )

        with torch.no_grad():

            outputs = clip_model(**inputs)

            image_embeds = (
                outputs.image_embeds
            )

            text_embeds = (
                outputs.text_embeds
            )

            image_embeds = image_embeds / image_embeds.norm(
                dim=-1,
                keepdim=True
            )

            text_embeds = text_embeds / text_embeds.norm(
                dim=-1,
                keepdim=True
            )

            similarity = (
                image_embeds @ text_embeds.T
            ).item()

        return {
            "similarity_score":
                round(similarity, 4)
        }

    except Exception as e:

        return {
            "error": str(e)
        }