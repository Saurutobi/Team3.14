#include <stdio.h>
#include <math.h>
int TestFloat(float paramfloat);
float GetAValue(char letter)
{
	float ReturnValue;
	ReturnValue = 3.3;
	printf("\nEnter Value for %c", letter);
	scanf("%f", &ReturnValue);
	
	if(TestFloat(ReturnValue) != 0.0)
	{ 
		printf("An invalid number has been found");
		exit(1);
	}
	return ReturnValue;
}
int TestFloat(float paramfloat)
{
	//IEEE standard says that this should return true if return value is NaN
	if(isnormal(paramfloat))
	{
		return 0;
	}

	return 14;
}
