#include <stdio.h>
#include <math.h>

float QuadraticMinus(float a, float b, float c)
{
	float x1;
	
	if((pow(b, 2) - 4. * a * c) > 0)
		x1 = (-b - sqrt(pow(b, 2) - 4 * a * c)) / (2 * a);
	
	else
		printf("The result for x1 is a non-real number\n");
	
	return x1;
}
