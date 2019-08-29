class LCS:

     # --------------------------------------------------
    def longest_common_substring(s1, s2):
        m = [[0] * (1 + len(s2)) for i in range(1 + len(s1))]
        longest, x_longest = 0, 0
      
        for x in range(1, 1 + len(s1)): #ambil per kata dari doc 1, dan x sebagai doc terpanjang
          for y in range(1, 1 + len(s2)): #ambil per kata dari doc 2
            if s1[x - 1] == s2[y - 1]: #cek juka kata dari doc 1 == doc 2
              m[x][y] = m[x - 1][y - 1] + 1
              if m[x][y] > longest:
                longest = m[x][y]
                x_longest = x
            else:
              m[x][y] = 0
        return s1[x_longest - longest: x_longest] #memilih lcs terpanjang

    def longest_common_sentence(s1, s2):
        
        s1_arr = []
        s2_arr = []
        s1_words = s1.split(' ') #memisah tiap kata menjadi array
        s2_words = s2.split(' ')
        
        lg_s1 = len(s1_words) #menghitung panjang kata pada dokumen
        lg_s2 = len(s2_words)
      
        if lg_s1 < lg_s2:   #menentukan dokumen terpanjang
            s1_arr = s2_words
            s2_arr = s1_words
        else:
            s1_arr = s1_words
            s2_arr = s2_words    
            
        lcs_arr = LCS.longest_common_substring(s1_arr, s2_arr)
        s1_pesent = (len(lcs_arr)*100)/len(s1_arr)
            
        lcs = ' '.join(lcs_arr) #menggabungkan array hasil lcs
        return lcs, s1_pesent
    
    # --------------------------------------------------    