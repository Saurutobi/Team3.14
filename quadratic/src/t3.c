/**
	@file	t3.c
	@brief	This code is used for testing our float validation code
*/
#include <stdlib.h>
#include "cunit.h"


float GetAValue(char a);

int main() {

float result;
// initialize the unit testing framework
cunit_init();


//this is a valid number and should pass
result = TestFloat(1554882.5451);
assert_feq("ret",result,0.0);

//this is not a number and shouldn't pass
result = TestFloat(NAN);
assert_feq("ret",result,14.0);

//another test here
result = TestFloat(.6549846579864687986487465498465986489846879884598746);
assert_feq("ret",result,0.0);


exit(0);
}
