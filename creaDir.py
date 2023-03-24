import os



respuesta=os.path.exists(r"D:\Usuarios\Miguel López-Aldana\Consumo Agua\Lecturas_2022\12_Diciembre_22")
print(respuesta)

if respuesta:
    os.chdir(r"D:\Usuarios\Miguel López-Aldana\Consumo Agua\Lecturas_2022\12_Diciembre_22")
    os.mkdir("Presentaciones")
    os.chdir(r".\Presentaciones")
    os.mkdir("Animaciones")
    os.mkdir("Graficafija")
    os.chdir(".\Animaciones")
    os.mkdir("01_ConsumoDia")
    os.mkdir("02_ConsumoAcum")
    os.mkdir("03_ConAcumBar")
    os.mkdir("04_ConAcumArea")
    os.mkdir("05_LecturaMedidor")
    os.mkdir("06_Nivel")
    os.mkdir("07_Pastel")
    os.mkdir("08_ConsumoReserva")
    os.mkdir("09_ConsumSemanal")
    os.mkdir("10_ReponeSemanal")



