export default function Container({ children }: { children: React.ReactNode }) {
    return (
        <section className=" pt-2 space-y-2" style={{ width: '90%', maxWidth: '1600px', margin: '0 auto' }}>
            {children}
        </section>
    );
};