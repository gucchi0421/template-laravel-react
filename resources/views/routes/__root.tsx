import { Outlet, createRootRoute } from '@tanstack/react-router';
import Layout from '../components/layouts/Layout';

export const rootRoute = createRootRoute({
  component: Root,
});

function Root() {
  return <Layout />;
}
