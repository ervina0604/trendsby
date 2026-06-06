import argparse
import json
import os
from pathlib import Path


def normalize_filename(url: str) -> str:
    if not url:
        return ""
    # remove query string and fragments
    url = url.split("?")[0].split("#")[0]
    name = os.path.basename(url)
    return name


def get_image_url(post: dict) -> str:
    for key in ["displayUrl", "image", "imageUrl", "thumbnailUrl", "url"]:
        if key in post and post[key]:
            return post[key]
    return ""


def prepare_post(post: dict, account_folder: str, images_root: str) -> dict:
    post = post.copy()
    remote_url = get_image_url(post)
    if not remote_url:
        return post

    file_name = normalize_filename(remote_url)
    if not file_name:
        return post

    local_dir = Path(images_root) / account_folder if account_folder else Path(images_root)
    local_path = local_dir / file_name
    post["displayUrl"] = str(local_path).replace("\\", "/")
    return post


def load_json(path: Path) -> list:
    with path.open("r", encoding="utf-8") as f:
        return json.load(f)


def save_json(path: Path, data: list) -> None:
    path.parent.mkdir(parents=True, exist_ok=True)
    with path.open("w", encoding="utf-8") as f:
        json.dump(data, f, indent=2, ensure_ascii=False)


def main() -> None:
    parser = argparse.ArgumentParser(
        description="Gabungkan JSON scraping dan ubah URL gambar ke path lokal."
    )
    parser.add_argument(
        "--input",
        nargs="+",
        required=True,
        help="File JSON input yang akan digabung, pisahkan dengan spasi.",
    )
    parser.add_argument(
        "--accounts",
        nargs="+",
        required=False,
        help="Nama folder akun yang sesuai dengan input JSON, misalnya ecoton pedulisungaisurabaya.",
    )
    parser.add_argument(
        "--images-root",
        default="images/posts",
        help="Root path gambar di public root, misalnya images/posts.",
    )
    parser.add_argument(
        "--output",
        default="public/data/merged_data.json",
        help="File JSON output hasil gabung.",
    )

    args = parser.parse_args()
    input_paths = [Path(p.strip()) for p in args.input if p.strip()]
    account_names = [a.strip() for a in args.accounts] if args.accounts else []

    if account_names and len(account_names) != len(input_paths):
        raise ValueError("Jumlah akun harus sama dengan jumlah file input.")

    merged = []
    for index, path in enumerate(input_paths):
        account_folder = account_names[index] if account_names else path.stem
        posts = load_json(path)
        for post in posts:
            merged.append(prepare_post(post, account_folder, args.images_root))

    save_json(Path(args.output), merged)
    print(f"Saved merged file: {args.output}")
    print(f"Total posts: {len(merged)}")


if __name__ == "__main__":
    main()
