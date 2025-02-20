import type { components } from '../../types/schema';
import client from './client';

export type UserListResource = components['schemas']['UserResource'][];
export type UserResource = components['schemas']['UserResource'];

export type AuthRegisterRequest = components['schemas']['AuthRegisterRequest'];
export type AuthLoginRequest = components['schemas']['AuthLoginRequest'];
export type AuthResource = components['schemas']['AuthResource'];

export async function userListRequest(): Promise<UserListResource> {
  const response = await client.GET('/user');
  if (!response.data) {
    throw new Error('Failed to fetch users');
  }
  return response.data.data;
}

export async function r({ email, password }: AuthLoginRequest): Promise<AuthResource> {
  const response = await client.POST('/auth/login', {
    body: {
      email: email,
      password: password,
    },
  });

  if (!response.data) {
    throw new Error('Failed to fetch users');
  }
  return response.data.data;
}
