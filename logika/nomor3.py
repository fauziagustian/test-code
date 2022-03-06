import re #import regex ini

def uppercase_check(password):
    if re.search('[A-Z]', password): #1 uppercase karakter
        return True
    return False

def lowercase_check(password):
    if re.search('[a-z]', password): #1 lowercase karakter
        return True
    return False

def digit_check(password):
    if re.search('[0-9]', password): #1 numerik karakter
        return True
    return False

def symbol_check(password):
    if re.search('[@#$%^&+=]', password): #1 simbol karakter
        alphabets = digits = special = 0
        for i in range(len(password)):
            if((password[i] >= 'a' and password[i] <= 'z') or (password[i] >= 'A' and password[i] <= 'Z')): 
                alphabets = alphabets + 1 
            elif(password[i] >= '0' and password[i] <= '9'):
                digits = digits + 1
            else:
                special = special + 1
        if special < 2:
            return False
        return True
    return False

def check_sequence(password):
    password = list(password)
    #return password
    for i in range(len(password)):
        if digit_check(password[i]):
            try:
                if digit_check(password[i+1]):
                    try:
                        if digit_check(password[i+2]):
                            return True
                    except:
                        return False
            except:
                return False
    return False


def user_input_password_check():
    password = input("Enter password : ")
    firstString = list(password)
    # print(check_sequence(password))
    if len(password) <= 8:
        print("Kata sandi minimal 8 karakter")
    if len(password) >32:
        print("Kata sandi maksimal 32 karakter")
    if not digit_check(password):
        print("Harus memiliki angka")
    if not uppercase_check(password) and not lowercase_check(password):
        print("Harus memiliki huruf kapital dan huruf kecil ")
    if not symbol_check(password):
        print("Harus memiliki 2 atau lebih simbol")
    if digit_check(firstString[0]):
        print("Karakter awal tidak boleh angka")
    if check_sequence(password):
        print("Tidak boleh memiliki 3 angka berurutan")
    
    
    

user_input_password_check()