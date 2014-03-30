/**
	@file	plus.c	
	@brief	The + part of the +/- when solving for roots
*/
#include <stdio.h>
#include <math.h>

float SquareRoot(float, float, float);

float QuadraticPlus(float a, float b, float c)
{
	float x1;
	float sqroot;

	sqroot = SquareRoot(a, b, c);

	if((pow(b, 2) - (4. * a * c)) > 0)
		x1 = (-b + sqroot) / (2 * a);
	
	else
		printf("The result for quadratic plus is a non-real number\n");
	
	return x1;
}
