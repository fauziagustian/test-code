def main():
    n = int(input('Masukan angka :'))
    x = 0
    for i in range(0, n):
        for j in range(0, n):
            if (i == 0 or i == n-1 or j == 0 or j == n-1 or j == (n - i -1)):
                print (end="X ")
            else:
                print (end="O ")
        print('\n')

main()