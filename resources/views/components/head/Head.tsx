type HeadProps = {
  title?: string;
  description?: string;
  keywords?: string;
};

export default function Head({ title, description, keywords }: HeadProps) {
  const baseTitle = '';
  const baseDescription = '';
  const baseKW = '';

  return (
    <>
      <title>{title ? `${title} | ${baseTitle}` : baseTitle}</title>
      <meta name="description" content={description ? description : baseDescription} />
      <meta name="keywords" content={keywords ? `${keywords} ${baseKW}` : baseKW} />
    </>
  );
}
