/**
	@file	t1.c
	@brief	This code tests our Quadratic Minus code using Cunit
*/
#include <stdlib.h>
#include "cunit.h"


float QuadraticMinus(float a, float b, float c);

///does the actual unit tests
int main() {

float a;
float b;
float c;
float result;
// initialize the unit testing framework
cunit_init();

//same variables but it passes
a = 1;
b = 5;
c = 6;
result = QuadraticMinus(a,b,c);
assert_feq("ret",result,-3.0);

//shouldn't pass off by a little
a = 2.1;
b = 3.2;
c = 1.2;
result = QuadraticMinus(a,b,c);
assert_feq("ret",result,-0.8571430444717407);


exit(0);
}
