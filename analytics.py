import matplotlib.pyplot as plt
import numpy as np
import sys
from scipy import interpolate

try_data = {
    #every list: time, current score
    1:[5,4,3],
    2:[5,4,4],
    5:[5,2,1]
}

# time_next = sys.argv[1]
# try_data[time_next] = [3,2,3]

def plot(data):
    x = data.keys()
    ys_raw = list(data.values())
    ys = np.transpose(np.array(ys_raw))
    num_vars = len(ys)
    plt.figure(figsize=(6,4))
    for i in range(num_vars):
        plt.plot(x,ys[i])



    # #make it smooth
    # # x_new, bspline, y_new
    # x_new = np.linspace(1, 5, 50)
        
    # for i in range(num_vars):
    #     bspline = interpolate.make_interp_spline(x, ys[i])
    #     y_new = bspline(x_new)

    #     # Plot the new data points
    #     plt.plot(x_new, y_new)
    
    plt.xlabel("time(s)")
    plt.ylabel("engagement level")
    plt.savefig("lines.png")
    plt.show()

    

#time_php = sys.argv[1]
#print(time_php)


plot(try_data)

    
    