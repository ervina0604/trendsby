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

    outputs = indobert_model(**inputs)

    logits = outputs.logits

    probs = torch.softmax(
        logits,
        dim=1
    )

    prediction = torch.argmax(
        probs,
        dim=1
    ).item()

    confidence = probs[0][prediction].item()

    labels = {
        0: "positive",
        1: "neutral",
        2: "negative"
    }

    return {
        "sentiment": labels[prediction],
        "score": round(confidence, 4)
    }
@app.post("/clip")
def clip_match(data: dict):

    try:

        image_path = data["image_path"]
        caption = data["caption"]

        image = Image.open(
            image_path
        ).convert("RGB")

        inputs = clip_processor(
            text=[caption],
            images=image,
            return_tensors="pt",
            padding=True
        )

        with torch.no_grad():

            outputs = clip_model(**inputs)

            similarity = (
                outputs.logits_per_image[0][0]
                .item()
            )

        return {
            "similarity_score": round(
                similarity,
                4
            )
        }

    except Exception as e:

        return {
            "error": str(e)
        }