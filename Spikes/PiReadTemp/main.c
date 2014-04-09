#include <stdio.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

void main(int argc, char * argv[])
{
	pid_t pid;
	FILE* inputFile;
	
//	while(1==1)
//	{
		pid = fork();
	
		if(pid == 0)
		{
			freopen("file.txt", "w", stdout);
			
			while(1==1)
			{
				char * argv[3] = {"Command-line", "11 4", NULL};
printf("ppbbbt");	
			execvp("Adafruit_DHT", argv);
				
				inputFile = fopen("file.txt", "r");
				
				char line[128];
				char copiedString[9];
					

				if(inputFile != NULL)
				{	
					fgets(line, sizeof line, inputFile);
					fgets(line, sizeof line, inputFile);
					strncpy(copiedString, line, 9);				
	
					if(strcmp(copiedString, "Data (40)") == 0)
					{
						fgets(line, sizeof line, inputFile);
						printf("%s", line);
						break;
					}		
	
				}
			}





			_exit(0);

			
		}
		else
		{
			int status;
			(void)waitpid(pid,&status,0);
		}
//	}
}
