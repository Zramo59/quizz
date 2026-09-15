import type { Category } from "../types";

const EMOJIS = ["🎬", "⚽", "📜", "🎵", "🌍", "🔬", "🎨", "📚", "🏛️", "🍔"];

function emojiFor(id: number) {
  return EMOJIS[id % EMOJIS.length];
}

interface CategoryCardProps {
  category: Category;
  onSelect: (category: Category) => void;
}

export function CategoryCard({ category, onSelect }: CategoryCardProps) {
  return (
    <button
      type="button"
      className="category-card"
      onClick={() => onSelect(category)}
    >
      <span className="category-card__emoji" aria-hidden="true">
        {emojiFor(category.id)}
      </span>
      <span className="category-card__label">{category.categorie}</span>
    </button>
  );
}
