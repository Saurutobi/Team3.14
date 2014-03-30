/**
	@file	sqrt.c
	@brief	this calculates the sqrt part of the quadratic equation
*/
#include <stdio.h>
#include <math.h>

float SquareRoot(float a, float b, float c)
{
	float result;
	result = sqrt(pow(b, 2) - (4 * a * c));

	return result;
}
