import json
from transformers import AutoTokenizer, AutoModelForSequenceClassification
import torch
from collections import Counter

sentiment_model_name = "w11wo/indonesian-roberta-base-sentiment-classifier"
tokenizer       = AutoTokenizer.from_pretrained(sentiment_model_name)
sentiment_model = AutoModelForSequenceClassification.from_pretrained(sentiment_model_name)

with open("public/data/pedulisungaisurabaya_data.json", "r", encoding="utf-8") as f:
    posts = json.load(f)

total             = len(posts)
hasil             = []
sentiment_counter = Counter()

for i, post in enumerate(posts):

    caption   = post.get("caption", "") or ""
    image_url = post.get("displayUrl", "")

    print(f"[{i+1}/{total}] Analyzing...")

    if not caption.strip():
        sentiment = "neutral"
    else:
        try:
            encoding = tokenizer(
                caption,
                return_tensors="pt",
                truncation=True,
                max_length=512,
                padding=True
            )
            output    = sentiment_model(**encoding)
            probs     = torch.softmax(output.logits, dim=1)
            probs     = probs.detach().numpy()[0]
            sentiment = ["negative", "neutral", "positive"][probs.argmax()]

        except Exception as e:
            print(f"ERROR: {e}")
            sentiment = "neutral"

    sentiment_counter[sentiment] += 1
    hasil.append({
        "caption"  : caption,
        "image"    : image_url,
        "sentiment": sentiment
    })

summary = {
    "total_posts"      : total,
    "sentiment_summary": dict(sentiment_counter),
    "details"          : hasil
}

with open("public/data/hasil_analisis.json", "w", encoding="utf-8") as f:
    json.dump(summary, f, indent=4, ensure_ascii=False)

print(f"Sentimen: {dict(sentiment_counter)}")