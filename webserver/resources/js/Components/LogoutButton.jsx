import { router } from '@inertiajs/react';

export default function LogoutButton() {
    const handleLogout = () => {
        router.post('/logout');
    };

    return (
        <button
            onClick={handleLogout}
            className="text-gray-600 hover:text-gray-900"
        >
            Logout
        </button>
    );
} 