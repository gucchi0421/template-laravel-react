import Cookies from 'js-cookie';

import createClient, { type Middleware } from 'openapi-fetch';
import type { paths } from '../../types/schema';

const client = createClient<paths>({
  baseUrl: 'http://localhost:8000/api',
});

const fetchRequestInterceptor: Middleware = {
  async onRequest({ request }) {
    const token = Cookies.get('token');
    if (!token) {
      return request;
    }
    request.headers.set('Authorization', `Bearer ${token}`);
    return request;
  },
};

client.use(fetchRequestInterceptor);

export default client;
