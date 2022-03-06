str = "Berikut adalah kisah sang gajah. Sang gajah memiliki teman serigala bernama DoeSang. Gajah sering dibela oleh serigala ketika harimau mendekati gajah."
str = str.lower()
str = str.replace(".", "")
arr = str.split()

arrWord = []
for i in range(len(arr)):
    if arr[i] == 'sang':
        if arr[i+1] == 'gajah':
            arrWord.append(arr[i] + " " + arr[i+1])
    if arr[i] == 'serigala':
        arrWord.append(arr[i])
    if arr[i] == 'harimau':
        arrWord.append(arr[i])

for x in range(len(arrWord)):
    if x == len(arrWord)-1:
        print(arrWord[x])
    else:
        print(arrWord[x], end =" - ")



    

