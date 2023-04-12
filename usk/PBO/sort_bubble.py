# Fungsi untuk menghitung rata-rata
def average(arr):
    return sum(arr) / len(arr)

# Fungsi untuk menampilkan menu

# Fungsi untuk melakukan sort bubble
def bubble_sort(arr, reverse=False):
    n = len(arr)
    for i in range(n):
        for j in range(0, n-i-1):
            if reverse:
                if arr[j] < arr[j+1]:
                    arr[j], arr[j+1] = arr[j+1], arr[j]
            else:
                if arr[j] > arr[j+1]:
                    arr[j], arr[j+1] = arr[j+1], arr[j]
    return arr

# Main program
arr = []

while True:
    user_input = input("Masukkan bilangan bulat (ketik 'selesai' untuk mengakhiri): ")
    if user_input.lower() == 'selesai':
        break
    try:
        arr.append(int(user_input))
    except ValueError:
        print("Input tidak valid. Silakan masukkan bilangan bulat.")

while True:
        print("=========================")
        ascending = bubble_sort(arr)
        descending = bubble_sort(arr, reverse=True)
        print("Hasil pengurutan ascending:", ascending)
        print("Hasil pengurutan descending:", descending)
        print("Nilai maksimum:", max(arr))
        print("Nilai minimum:", min(arr))
        print("Total nilai:", sum(arr))
        print("Rata-rata nilai:", average(arr))
        break
