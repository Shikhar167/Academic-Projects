#include <iostream>
#include <fstream>
#include <climits>
#include <string>
#include <sstream>
#include <omp.h>
using namespace std;
void updateSubmatrix(int a_row,int a_col,int b_row,int b_col,int c_row,int c_col,int **A,int b)
	{
		//This will update the tile which is having dimension bXb 
		int i,j,k;
		for(k=0;k<b;k++)
		{
			for(i=0;i<b;i++)
				for(j=0;j<b;j++)
				   if(A[b_row+i][b_col+k]< INT_MAX && A[c_row+k][c_col+j]< INT_MAX )	
					 A[a_row+i][a_col+j]=min(A[a_row+i][a_col+j],(A[b_row+i][b_col+k]+A[c_row+k][c_col+j]));
		}			
	}

void tiledFloydWarshall(int **A,int n,int b,int t)
{
	//ntrow is for number of times kth-block will iterate
	//nbrow is actually the dimension of each tile nbrowXnbrow
	int ntrow=n/b;
	int nbrow=n/ntrow;
	int k,i,j;
	omp_set_num_threads(t);

	for(k=0;k<ntrow;k++) //Iterator to position our main tile.
	{
		//Phase 1: updates the k-th diagonal-tile(main tile)
		updateSubmatrix(k*nbrow,k*nbrow,k*nbrow,k*nbrow,k*nbrow,k*nbrow,A,b);

		//Phase 2:updates the tiles which are remained in the main tile row.
		#pragma omp parallel for //both simd and parallel 
		for(j=0;j<ntrow;j++)
		  {	
			if(j==k)
				{}
			else
			{
				updateSubmatrix(k*nbrow,j*nbrow,k*nbrow,k*nbrow,k*nbrow,j*nbrow,A,b);
			}
		   }

		//Phase 3:updates the tiles which are remained in the main tile column.
		#pragma omp parallel for simd	
		for(i=0;i<ntrow;i++)
		  {	
			 if(i==k){}
			 else
			 {
			 	 updateSubmatrix(i*nbrow, k*nbrow,i*nbrow, k*nbrow,k*nbrow, k*nbrow,A,b);
			 }
		  }	 	


		//Phase 4:finally it updates the remaining tiles except that main tile row and column of the matrix	 
		#pragma omp parallel for collapse(2)	 
		for(i=0;i<ntrow;i++)
		{
			for(j=0;j<ntrow;j++)
			{
				if(i==k||j==k){}
				else
				{
					updateSubmatrix(i*nbrow, j*nbrow,i*nbrow, k*nbrow,k*nbrow, j*nbrow,A,b);
				}	
			}
		}	 

	}
}
struct Graph {
    int **A; 
    int VertexCount;
    int EdgeCount;
};
int main()
{
	int i,j;

	int b;
	cout<<"Enter block size :";
	cin>>b;

	int t;
	cout<<"Enter Number of Threads :";
	cin>>t;
	omp_set_num_threads(t);

	int n,dadd=0,dr;

	Graph G;
	int **D;
	bool declared = false;
    string GraphType, token;

    cout << endl << "Taking Graph from sample3.txt and "<<INT_MAX<<" means Infinity :\n" << endl;
    ifstream fl("./sample3.txt");
    for(string line; getline(fl, line);)
    {
    	 if (line[0] == 'c') 
    	 	   continue;
    	 else if (line[0] == 'p')
    	 	{
    	 		istringstream iss(line);
                iss >> token >> GraphType >> G.VertexCount >> G.EdgeCount;
                n=G.VertexCount;
                dr=n%b;
                if(dr!=0)
					dadd=b-dr;

                if (G.VertexCount > 0)
                {
                	G.A=new int*[G.VertexCount+dadd];
                	D= new int*[G.VertexCount+dadd];
                	for(int i=0;i<G.VertexCount+dadd;i++)
                		{
                			G.A[i]=new int[G.VertexCount+dadd];
                			D[i]=new int[G.VertexCount+dadd];
                		}	

                	#pragma omp parallel for collapse(2)
                	for(i=0;i<G.VertexCount+dadd;i++)
                	 {	
                      for(j=0;j<G.VertexCount+dadd;j++)
                         {
                      	   if(i==j && i<n)
                      	  	   G.A[i][j]=0;
                      	   else	
                      		   G.A[i][j]=INT_MAX;
                      	  }	
                      }	  
                    declared=true;   
                }

    	 	}
    	 else if(declared && line[0] == 'a') 
    	  {
            int w;
            istringstream iss(line);
            iss >> token >> i >> j >> w; 
            G.A[i-1][j-1] = w;     
          }		

    }

    //Copying Graph 'G.A' to 'D' to apply standard floyd-warshall algorithm on 'D'.
    #pragma omp parallel for collapse(2)   
    for(i=0;i<n+dadd;i++)
    {
         for(j=0;j<n+dadd;j++)
         {
         	 D[i][j]=G.A[i][j];
         }	 
    }  	

  /*  //'D' weight graph, Before Applying Standard Floyd-warshall Algorithm.
    cout<<"Parallelized Standard Floyd-Warshall Algorithm :\n\n";
    cout<<"Input Graph :\n";   
    for(i=0;i<n;i++)
	{
		for(j=0;j<n;j++)
			cout<<D[i][j]<<" ";
		cout<<"\n";
	}	*/

	//Applying Parallelization to Standard Floyd-Warshall Algorithm and Calculating the Runtime for that Algorithm.
    double tm0 = omp_get_wtime(); 
    for(int k=0;k<n;k++)
        #pragma omp parallel for collapse(2)
        for(i=0;i<n;i++)
         {	
            for(int j=0;j<n;j++) 
            {
                if(D[i][k]<INT_MAX && D[k][j]<INT_MAX) 
                {
                    int d=D[i][k]+D[k][j];
                    if (d<D[i][j]) 
                    {
                         D[i][j] = d;
                    }
                }
             }   
         }      
    tm0= omp_get_wtime() - tm0; 

   /* //'D' weight graph, After Applying Standard Floyd-warshall Algorithm i.e. Shortest path matrix.
    cout<<"All Pairs Shortest Path Matrix :\n";
    for(i=0;i<n;i++)
	{
		for(j=0;j<n;j++)
			cout<<D[i][j]<<" ";
		cout<<"\n";
	} */
    cout << "Parallelized Standard FloydWarshall Algorithm Runtime is: " << tm0 << " seconds.\n\n";



   /*  //'G.A' weight graph, Before Applying Tiled Floyd-warshall Algorithm.
    cout<<"Parallelized Tiled Floyd-Warshall Algorithm :\n\n";
    cout<<"Input Graph :\n";   
	for(i=0;i<n;i++)
	{
		for(j=0;j<n;j++)
			cout<<G.A[i][j]<<" ";
		cout<<"\n";
	}	*/

	//Applying Parallelization to Tiled Floyd-Warshall Algorithm and Calculating the Runtime for that Algorithm.
	double tm = omp_get_wtime(); 
	tiledFloydWarshall(G.A,n+dadd,b,t);
	tm = omp_get_wtime() - tm; 


    /*//'G.A' weight graph, After Applying Tiled Floyd-warshall Algorithm i.e. Shortest path matrix.
 	cout<<"All Pairs Shortest Path Matrix :\n";
	for(i=0;i<n;i++)
	{
		for(j=0;j<n;j++)
			cout<<G.A[i][j]<<" ";
		cout<<"\n";
	} */

    cout << "But Parallelized Tiled FloydWarshall Algorithm Runtime is: " << tm << " seconds.\n";	


	cout<<"\nAnyway Parallelized Tiled Floyd-Warshall Algorithm is taking less time for execution. \n";

    int option;
	cout<<"\nEnter \n1.To Print Shortest Path Matrix \n2.To Print Shortest Path distance between two Vertices \nOther number for Exit :";
	cin>>option;
	switch(option)
	{

		case 1:
				cout<<"All Pairs Shortest Path Matrix :\n";
				for(i=0;i<n;i++)
				{
					for(j=0;j<n;j++)
					{
						cout<<G.A[i][j]<<" ";
					}	
					cout<<"\n";
				}
				break;

		case 2:
		      cout<<"Enter two Vertices : ";
		      int a1,a2;
		      cin>>a1>>a2;
		      if(G.A[a1-1][a2-1]==INT_MAX)
		      	cout<<"\nShortest Path Distance between "<<a1<<" and "<<a2<<" is : No Path"<<endl;
		      else
		         cout<<"\nShortest Path Distance between "<<a1<<" and "<<a2<<" is :"<<G.A[a1-1][a2-1]<<endl;
              break;

       default:
              break;
	}
}
/*
 Input Graph i.e.. Adjacency Matrix Will be Given As
 Ex:
 	[0    3         Infnity  7       ]
 	[8    0         2        Infinity]
 	[5    Infinity  0        1       ]
 	[2    Infinity  Infinity 0       ]

  This Matrix Will be Given Input from txt file As
  Like This..

  	c no-of-vertices no-of-edges 
	p sp 4 7
	c from to edge-weight 
	a 1 2 3
	a 2 1 8
	a 2 3 2
	a 3 1 5
	a 3 4 1
	a 4 1 2
	a 1 4 7 

 Explanation:
   
  -> Line Starts With 'c' is considered as comments in program means it will be omitted.

  -> Line Starts With 'p' contains 3 arguments more
  		1. sp--Graph Type
  		2.Number of Vertices.
  		3.Number of Edges

  -->Line Starts With 'a' contains 3 arguments more
        1.Node From where Edge Starts.
        2.Node To Where Edge Connected.
        3.Weight of the Edge.

  After filling these values from txt to Adjacency Matrix, 
  Fill the Remaining Values With Infinity(Programmatically INT_MAX)
  Except Diagonal Values which are Logically Zero.
        		
*/
