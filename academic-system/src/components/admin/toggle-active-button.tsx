'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import { Eye, EyeOff } from 'lucide-react';
import { Button } from '@/components/ui/button';

interface ToggleActiveButtonProps {
  id: string;
  isActive: boolean;
  endpoint: string;
}

export function ToggleActiveButton({ id, isActive, endpoint }: ToggleActiveButtonProps) {
  const router = useRouter();
  const [isLoading, setIsLoading] = useState(false);

  const handleToggle = async () => {
    setIsLoading(true);
    try {
      const response = await fetch(`${endpoint}/${id}`, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ isActive: !isActive }),
      });

      if (response.ok) {
        router.refresh();
      } else {
        alert('เกิดข้อผิดพลาดในการอัปเดต');
      }
    } catch (error) {
      alert('เกิดข้อผิดพลาดในการอัปเดต');
    } finally {
      setIsLoading(false);
    }
  };

  return (
    <Button
      variant="ghost"
      size="icon"
      onClick={handleToggle}
      disabled={isLoading}
      title={isActive ? 'ปิดใช้งาน' : 'เปิดใช้งาน'}
    >
      {isActive ? (
        <Eye className="h-4 w-4 text-green-600" />
      ) : (
        <EyeOff className="h-4 w-4 text-muted-foreground" />
      )}
    </Button>
  );
}
