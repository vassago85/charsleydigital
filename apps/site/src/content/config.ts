import { defineCollection, z } from 'astro:content';

const pagesCollection = defineCollection({
  type: 'content',
  schema: z.object({
    title: z.string(),
    description: z.string(),
    hero: z.object({
      headline: z.string(),
      subheadline: z.string().optional(),
    }),
    sections: z.array(z.record(z.unknown())).optional(),
    cta: z.object({
      title: z.string(),
      description: z.string().optional(),
      buttonText: z.string(),
    }).optional().nullable(),
  }),
});

export const collections = {
  pages: pagesCollection,
};
