export interface Category {
  id: number;
  categorie: string;
}

/** Raw question shape returned by the Laravel API. */
export interface ApiQuestion {
  id: number;
  categorie: string;
  question: string;
  reponse1: string;
  reponse2: string;
  reponse3: string;
  reponse4: string;
  reponse5: string;
  reponse6: string;
  reponse7: string;
  reponse8: string;
  reponse9: string;
  reponse10: string;
}

/** Question ready to be displayed: 4 shuffled answers, correct one identified. */
export interface QuizQuestion {
  id: number;
  categorie: string;
  question: string;
  answers: string[];
  correctAnswer: string;
}
