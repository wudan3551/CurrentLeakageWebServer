#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include <sys/types.h>
#include <sys/ipc.h>
#include <sys/shm.h>

int main(int argc,char* argv[]) {
	key_t mynotify = ftok("/usr/share/nginx/html/ipc/dan",'z');
	int ShmID;
	char *ShmPTR;

	//printf("%x\n",mynotify);
	ShmID = shmget(mynotify,100,0666);
	ShmPTR = (char *)shmat(ShmID,NULL,0);//attach a pointer to point at shared memory
	
	*ShmPTR = 'F';

	printf("%s\n",ShmPTR);

	shmdt((void *)ShmPTR);//detach the pointer with the shared memory

	return 0;
}
