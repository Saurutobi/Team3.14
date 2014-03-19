// qsolve_interface.c
// The main and io for qsolve.
// This should likely be broked done into seperate modules viz 
// the three level design to improve unit testing.S
//
// MY BAD. These comments really need an example and notes on how it should run,
// as the return values it provides!

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "qsolve_roots.h"

//X NLINE is the size of the char array str and the lenght of the longest legal user input line.
#define NLINE 100

//X Line is a structure for passing a line of text, and a code for status
typedef struct {
  int   max;   // size of str array
  int   len;   // legnth of string in str
  int   code;  // status code
  char  *str;  // pointer to array of max bytes
}  Line;

int validator_abc(Line *linein, Coef *coef);

int main() {
Coef	coef;       // coefs of the quadratic (3 doubles), passed to qsolve
Root    root;       // roots of the quadratic (2 doubles), returned from qsolve()
int	qs;         // qsolve() return code

coef.a = 1.0;
coef.b = 4.0;
coef.c = 3.0;


    switch (qs=qsolve_roots(&coef, &root))  {
    case -2: // No real roots
             printf("No real roots\n");
             break;
    case -1: // Not a quadratic (a == 0)
             printf("Not a quadratic (a==0)\n");
             break;
    case 1:  // double real root
             printf("Double real root %24.16f", root.x1);
             break;
    case 2:  // two distinct roots
             printf("Roots  %24.16f  %24.16f", root.x1, root.x2);
             break;
    default: fprintf(stderr,"System failure: quadratic solver error code=%d\n", qs);
             exit(1);
             break;
  }
exit(0);
}

