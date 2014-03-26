all:
	gcc -c quadratic.c minus.c plus.c -lm
	gcc *.o -lm

clean:
	rm *.o

minus:
	gcc -c t1.c minus.c cunit.c
	gcc t1.o minus.o cunit.o -lm
