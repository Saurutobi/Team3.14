#include <stdlib.h>
#include "cunit.h"


float QuadraticPlus(float a, float b, float c);

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
result = QuadraticPlus(a,b,c);
assert_feq("ret",result,-2.0);

//barely pass
a = 2.1;
b = 3.2;
c = 1.2;
result = QuadraticPlus(a,b,c);
assert_feq("ret",result,-0.6666665673255920);


exit(0);
}
