#include <stdio.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

void main(int argc, char * argv[])
{
	pid_t pid;
	
	pid = fork();

	if(pid == 0)
	{
		freopen("file.txt", "w", stdout);
		char * argv[3] = {"Command-line", "main.c", NULL};
		execvp("cat", argv);
		_exit(0);
	}
	else
	{
		int status;
		(void)waitpid(pid,&status,0);
		printf("we are back bitches");
	}
}
