import { useState } from 'react';
import LogoutButton from '@/Components/LogoutButton';

export default function AuthenticatedLayout({ children }) {
    return (
        <div className="min-h-screen bg-gray-100">
            <nav className="bg-white border-b border-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16 items-center">
                            <h1 className="text-xl font-bold">LRWebserver</h1>

                            <div className="flex items-center justify-center">
                                <a href="/dashboard" className="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                    Dashboard
                                </a>
                            </div>
                            
                            <LogoutButton />
                    </div>
                </div>
            </nav>

            <main className="py-12">
                <div className="max-w-[80%] mx-auto sm:px-6 lg:px-8">
                    {children}
                </div>
            </main>
        </div>
    );
} 