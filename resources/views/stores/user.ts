import { useAtomValue, useSetAtom } from 'jotai/react';
import { atomWithStorage } from 'jotai/utils';
import Cookies from 'js-cookie';

export interface UserInfo {
  id: number;
  username: string;
}

export const userAtom = atomWithStorage<UserInfo | null>('user', null);

export function useIsLoggedIn() {
  const user = useAtomValue(userAtom);
  const token = Cookies.get('token');

  return user !== null && token !== undefined;
}

export function useLogin() {
  const setUser = useSetAtom(userAtom);

  return (user: UserInfo, token: string) => {
    setUser(user);
    Cookies.set('token', token, {
      expires: 7,
      // secure: true
    });
  };
}

export function useLogout() {
  const setUser = useSetAtom(userAtom);

  return () => {
    setUser(null);
    Cookies.remove('token');
  };
}

export function useGetUsername() {
  const user = useAtomValue(userAtom);
  return user?.username;
}
