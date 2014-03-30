/**
	@file	quadratic.c
	@brief	Main Method of program


	This is our implementation of a quadratic equation solver
	using methods of the extreme programming.
	Required things include
		unit testing
		Doxygen compatable commenting
		lots of modularization
		
*/
#include "logging.h"
#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <stdbool.h>
#include "quadratic.h"

int main()
{
	float a = 0.0, b = 0.0, c = 0.0;
	float x1, x2;
	
	a = GetAValue('a');
	b = GetAValue('b');
	c = GetAValue('c');

	#if LOG > 0
		printf("Logging from Main\n About to call QuadPlus and QuadMinus\n\n");
	#endif
	
	x1 = QuadraticPlus(a, b, c);
	x2 = QuadraticMinus(a, b, c);
	
	//Now to output to terminal
	printf("\nThe quadratic result for a = %f, b = %f, c = %f is:\nx1 = %.8f\nx2 = %.8f\n\n", a, b, c, x1, x2);	
	
	return 0;
}
