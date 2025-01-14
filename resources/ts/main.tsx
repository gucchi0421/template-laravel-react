import { RouterProvider, createRouter } from '@tanstack/react-router';
import { StrictMode } from 'react';
import ReactDOM from 'react-dom/client';
import { indexRoute } from './routes';
import { rootRoute } from './routes/__root';
import { TaskRoute } from './routes/task';
import { TaskIDRoute } from './routes/task/$taskId';

export const routeTree = rootRoute.addChildren([indexRoute, TaskRoute, TaskIDRoute]);

const router = createRouter({ routeTree });

declare module '@tanstack/react-router' {
  interface Register {
    router: typeof router;
  }
}

const rootElement = document.getElementById('app')!;
if (!rootElement.innerHTML) {
  const root = ReactDOM.createRoot(rootElement);
  root.render(
    <StrictMode>
      <RouterProvider router={router} />
    </StrictMode>,
  );
}
