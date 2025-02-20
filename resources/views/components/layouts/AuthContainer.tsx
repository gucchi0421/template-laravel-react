import { useNavigate } from '@tanstack/react-router';
import { useIsLoggedIn } from '../../stores/user';
import Container from './Container';

export default function AuthContainer({ children }: { children: React.ReactNode }) {
  const isLoggedin = useIsLoggedIn();
  const navigate = useNavigate();

  if (!isLoggedin) {
    navigate({ to: '/' });
  }

  return <Container>{children}</Container>;
}
