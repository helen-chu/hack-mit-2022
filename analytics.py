import matplotlib.pyplot as plt
import numpy as np
import sys

try_data = {
    #every list: time, current score
    1:[5,4,3],
    2:[5,4,4],
    5:[5,2,1]
}

time_next = sys.argv[1]
try_data[time_next] = [3,2,3]

def plot(data):
    x = data.keys()
    ys_raw = list(data.values())
    ys = np.transpose(np.array(ys_raw))
    num_vars = len(ys)
    for i in range(num_vars):
        plt.plot(x,ys[i])
    #plt.legend()
    #plt.savefig("lines.png")
    plt.show()

result = sys.argv[1]
print(result+" by python!")

plot(try_data)

    
    