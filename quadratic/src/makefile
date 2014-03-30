all:
	gcc -c quadratic.c minus.c plus.c acceptInput.c sqrt.c -lm
	gcc quadratic.o minus.o plus.o acceptInput.o sqrt.o -lm -o solver.exe
clean:
	rm *.o

plus:
	gcc -c t2.c plus.c sqrt.c cunit.c
	gcc t2.o plus.o cunit.o sqrt.o -lm -o plustesting.exe

minus:
	gcc -c t1.c minus.c sqrt.c cunit.c
	gcc t1.o minus.o cunit.o sqrt.o -lm -o minustesting.exe

input:
	gcc -c t3.c acceptInput.c cunit.c
	gcc t3.o acceptInput.o cunit.o -lm -o inputTesting.exe
