from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
from transformers import (
    CLIPProcessor,
    CLIPModel,
    AutoTokenizer,
    AutoModelForSequenceClassification
)
from PIL import Image
import torch

app = FastAPI()

device = torch.device("cuda" if torch.cuda.is_available() else "cpu")

clip_model_name = "openai/clip-vit-base-patch32"
clip_processor = CLIPProcessor.from_pretrained(clip_model_name)
clip_model = CLIPModel.from_pretrained(clip_model_name).to(device)
clip_model.eval()

indobert_model_name = "w11wo/indonesian-roberta-base-sentiment-classifier"
tokenizer = AutoTokenizer.from_pretrained(indobert_model_name)
indobert_model = AutoModelForSequenceClassification.from_pretrained(
    indobert_model_name
).to(device)
indobert_model.eval()


class SentimentRequest(BaseModel):
    caption: str

class ClipRequest(BaseModel):
    image_path: str
    caption: str


@app.post("/sentiment")
def sentiment(data: SentimentRequest):

    inputs = tokenizer(
        data.caption,
        return_tensors="pt",
        truncation=True,
        padding=True
    ).to(device)

    with torch.no_grad():
        outputs = indobert_model(**inputs)
        probs = torch.softmax(outputs.logits, dim=1)

    pred = torch.argmax(probs, dim=1).item()
    confidence = probs[0][pred].item()

    label = indobert_model.config.id2label[pred].lower()

    return {
        "sentiment": label,
        "score": round(float(confidence), 4)
    }


@app.post("/clip")
def clip_match(data: ClipRequest):
    try:
        image = Image.open(data.image_path).convert("RGB")

        inputs = clip_processor(
            text=[data.caption],
            images=image,
            return_tensors="pt",
            padding=True
        ).to(device)

        with torch.no_grad():
            outputs = clip_model(**inputs)

            image_features = outputs.image_embeds
            text_features = outputs.text_embeds

            image_features = image_features / image_features.norm(dim=-1, keepdim=True)
            text_features = text_features / text_features.norm(dim=-1, keepdim=True)

            similarity = (image_features @ text_features.T).item()

        return {"similarity_score": round(similarity, 4)}

    except Exception as e:
        return {"error": str(e)}