nim = input("Masukkan NIM: ")

digit_terakhir = int(nim[-1])

nilai = (digit_terakhir * 10) + 5

daftar_nilai = []
daftar_nilai.append(nilai)

print(f"Nilai dasar dari NIM: {nilai}")
jumlah_tambahan = int(input("Masukkan jumlah nilai tambahan: "))
for i in range(jumlah_tambahan):
    nilai = float(input(f"Masukkan nilai tambahan ke-{i+1}: "))
    daftar_nilai.append(nilai)

total = 0
for n in daftar_nilai:
    total += n

rata_rata = total / len(daftar_nilai)
if rata_rata >= 85:
    grade = "A"
elif rata_rata >= 75:
    grade = "B"
elif rata_rata >= 65:
    grade = "C"
elif rata_rata >= 50:
    grade = "D"
else:
    grade = "E"

if rata_rata >= 60:
    status = "Lulus"
else:
    status = "Tidak Lulus"

print("\n=== HASIL AKHIR ===")
print(f"Daftar Nilai: {daftar_nilai}")
print(f"Rata-rata: {rata_rata:.2f}")
print(f"Grade: {grade}")
print(f"Status: {status}")