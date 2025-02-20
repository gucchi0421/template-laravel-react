import Container from '../components/layouts/Container';
import { createRoute } from '@tanstack/react-router';
import { rootRoute } from './__root';
import { useEffect, useState } from 'react';
import Head from '../components/head/Head';
import type { components } from '../types/schema';
import client from '../libs/api/client';
import { userListRequest, type UserListResource } from '../libs/api/user';

export const indexRoute = createRoute({
  getParentRoute: () => rootRoute,
  path: '/',
  component: Index,
});

function Index() {
  const [users, setUsers] = useState<UserListResource | undefined>(undefined);

  useEffect(() => {
    userListRequest().then(setUsers).catch(console.error);
  }, []);

  return (
    <>
      <Head title="Index" description="Index page" keywords="index" />

      <Container>
        <h1>Index</h1>

        {users ? (
          <ul>
            {users.map((user) => (
              <li key={user.id}>
                {user.name} ({user.email}) - {user.created_at}
              </li>
            ))}
          </ul>
        ) : (
          <p>Loading...</p>
        )}
      </Container>
    </>
  );
}
