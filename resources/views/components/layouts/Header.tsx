import { Link } from '@tanstack/react-router';

export default function Header() {
  return (
    <header className="bg-gray-100">
      <div className=" flex justify-between px-6 py-2 ">
        <div>
          <h1>
            <Link to="/">Header</Link>
          </h1>
        </div>
        <div>
          <ul className="flex gap-4">
            <Link to="/">Home</Link>
          </ul>
        </div>
      </div>
    </header>
  );
}
