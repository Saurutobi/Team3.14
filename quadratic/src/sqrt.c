/**
	@file	sqrt.c
	@brief	this calculates the sqrt part of the quadratic equation
*/
#include "logging.h"
#include <stdio.h>
#include <math.h>

float SquareRoot(float a, float b, float c)
{
	float result;
	result = sqrt(pow(b, 2) - (4 * a * c));
	#if LOG > 0
		printf("Logging From Square Root Function\n");
		printf("a = %f\nb = %f\nc = %f\n",a,b,c);
		printf("result = %f\n", result);
	#endif
	return result;
}
