#arr = [5, 2, 8, 4, 3, 10]
#arr = [2, 3, 4, 6] 
arr = [8, 6, 7, 12]
temp = 0;    
       

def cacah_terkecil(arr):
    for i in range(0, len(arr)):    
        if(arr[i]+1 < arr[i+1]):
            return arr[i]+1

for i in range(0, len(arr)):    
    for j in range(i+1, len(arr)):    
        if(arr[i] > arr[j]):    
            temp = arr[i];    
            arr[i] = arr[j];    
            arr[j] = temp;
    
print(cacah_terkecil(arr))     
