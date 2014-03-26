/*	Quadratic Equation */

#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <stdbool.h>

float QuadraticPlus(float, float, float);
float QuadraticMinus(float, float, float);

int main()
{
	float a = 0.0, b = 0.0, c = 0.0;
	float x1, x2;
	bool goodData = true;	//assume data is good
	
	printf("Enter values for a, b, c separated by spaces: ");
	scanf("%f %f %f", &a, &b, &c);
	
	//Data validation
	if (a == 0.0)
	{
		goodData = false;
		do{
			printf("\"a\" can't be equal to 0. Try again: ");
			scanf("%f", &a);
			if (a == 0.0)
				goodData = true;
		}while (goodData = false);
	}
	
	//Calculate them bad boys
	x1 = QuadraticPlus(a, b, c);
	x2 = QuadraticMinus(a, b, c);
	
	//Now to output to terminal
	printf("\nThe quadratic result for a = %f, b = %f, c = %f is:\nx1 = %.8f\nx2 = %.8f\n\n", a, b, c, x1, x2);	
	
	//Grab a beer, job well done
	return 0;
}
