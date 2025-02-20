import { Outlet } from "@tanstack/react-router";
import Header from "./Header";
import Footer from "./Footer";
import { TanStackRouterDevtools } from "@tanstack/router-devtools";

export default function Layout() {
  return (
    <>
      <div className="flex flex-col min-h-screen">
        <Header />
        <main className="flex-1">
          <Outlet />
        </main>
        <Footer />
      </div>
      {process.env.NODE_ENV === 'development' && <TanStackRouterDevtools />}
    </>
  );
}
