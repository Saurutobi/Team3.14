all:
	gcc -c quadratic.c minus.c plus.c sqrt.c -lm
	gcc quadratic.o minus.o plus.o sqrt.o -lm

clean:
	rm *.o

plus:
	gcc -c t2.c plus.c sqrt.c cunit.c
	gcc t2.o plus.o cunit.o -lm

minus:
	gcc -c t1.c minus.c sqrt.s cunit.c
	gcc t1.o minus.o cunit.o -lm
