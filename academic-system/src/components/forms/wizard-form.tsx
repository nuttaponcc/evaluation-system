'use client';

import { useState, ReactNode } from 'react';
import { Check } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import { cn } from '@/lib/utils';

interface WizardStep {
  id: string;
  title: string;
  description?: string;
}

interface WizardFormProps {
  steps: WizardStep[];
  children: ReactNode[];
  onSubmit: () => Promise<void>;
  isSubmitting?: boolean;
  submitLabel?: string;
}

export function WizardForm({
  steps,
  children,
  onSubmit,
  isSubmitting = false,
  submitLabel = 'บันทึก',
}: WizardFormProps) {
  const [currentStep, setCurrentStep] = useState(0);

  const goToNext = () => {
    if (currentStep < steps.length - 1) {
      setCurrentStep(currentStep + 1);
    }
  };

  const goToPrevious = () => {
    if (currentStep > 0) {
      setCurrentStep(currentStep - 1);
    }
  };

  const isLastStep = currentStep === steps.length - 1;

  return (
    <div className="space-y-6">
      {/* Step Indicator */}
      <div className="flex items-center justify-center">
        <div className="flex items-center space-x-4">
          {steps.map((step, index) => (
            <div key={step.id} className="flex items-center">
              <button
                type="button"
                onClick={() => index < currentStep && setCurrentStep(index)}
                className={cn(
                  'flex items-center justify-center w-10 h-10 rounded-full border-2 transition-colors',
                  index < currentStep
                    ? 'bg-primary border-primary text-primary-foreground cursor-pointer'
                    : index === currentStep
                    ? 'border-primary text-primary'
                    : 'border-muted-foreground/30 text-muted-foreground cursor-not-allowed'
                )}
                disabled={index > currentStep}
              >
                {index < currentStep ? (
                  <Check className="h-5 w-5" />
                ) : (
                  <span className="text-sm font-medium">{index + 1}</span>
                )}
              </button>
              {index < steps.length - 1 && (
                <div
                  className={cn(
                    'w-12 h-0.5 ml-4',
                    index < currentStep ? 'bg-primary' : 'bg-muted-foreground/30'
                  )}
                />
              )}
            </div>
          ))}
        </div>
      </div>

      {/* Step Title */}
      <div className="text-center">
        <h2 className="text-xl font-semibold">{steps[currentStep].title}</h2>
        {steps[currentStep].description && (
          <p className="text-muted-foreground mt-1">{steps[currentStep].description}</p>
        )}
      </div>

      {/* Step Content */}
      <Card>
        <CardContent className="pt-6">
          {children[currentStep]}
        </CardContent>
        <CardFooter className="flex justify-between border-t pt-6">
          <Button
            type="button"
            variant="outline"
            onClick={goToPrevious}
            disabled={currentStep === 0 || isSubmitting}
          >
            ย้อนกลับ
          </Button>
          {isLastStep ? (
            <Button type="button" onClick={onSubmit} disabled={isSubmitting}>
              {isSubmitting ? 'กำลังบันทึก...' : submitLabel}
            </Button>
          ) : (
            <Button type="button" onClick={goToNext}>
              ถัดไป
            </Button>
          )}
        </CardFooter>
      </Card>
    </div>
  );
}
