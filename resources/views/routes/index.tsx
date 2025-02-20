import Container from '../components/layouts/Container';
import { createRoute } from '@tanstack/react-router';
import { rootRoute } from './__root';
import { useEffect, useState } from 'react';
import type { User } from '../types/user';
import client from '../libs/axios/client';
import Head from '../components/head/Head';

export const indexRoute = createRoute({
  getParentRoute: () => rootRoute,
  path: '/',
  component: Index,
});

function Index() {
  const [users, setUsers] = useState<User[] | null>(null);

  useEffect(() => {
    async function getUsers() {
      const resp = await client.get<User[]>('/user');
      setUsers(resp.data);
    }
    getUsers();
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
                {user.name} ({user.email})
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
