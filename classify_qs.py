import re
from collections import Counter

try_qs = [
    "On function essay_scoring_experiment(training_file1, training_file2, testdir1, testdir2), can we assume input1 and input3 always belong to 1 category, and input2 and input4 always belong to another category? ",
    "Is START not a unigram",
    "For bigrams, do we have to account for cases of unseen context other than START?",
    "Grading will solely be based on the methods/functions as mentioned in parts 1-7 only, not stuff in main. Is that correct? ",
    "I notice that some examples in the files have extra lines, inducing (STOP,STOP) bigrams. How should we handle such a case? Or am I doing something wrong in my code?",
    "I provided absolute paths from my system to access the ets toefl data. Can I submit as is or do I have to modify it back? "
]
try_qs_1 = [
    "hi ",
    "Is START not a unigram",
    "hello",
    "Grading",
    "I notice",
    "hi hi hello"
]

try_qs_labels = {
    "hw1_content":[0,1,2,4],
    "hw1_logistics":[3,5],
    "unigrams": [1],
    "bigrams": [2,4]
}

def train_labels(qs,qs_labels):
    split_qs = []
    for q in qs:
        q = q.lower()
        q.replace('; ', ' ')
        q.replace(', ', ' ')
        q.replace('_ ', ' ')
        q.replace('( ', ' ')
        q.replace(') ', ' ')
        q.replace('? ', ' ')
        q.replace('   ', ' ')
        q.replace('  ', ' ')
        split_q = q.split(' ')
        split_qs.append(split_q)
    
    trained_labels = {}
    for label in qs_labels.keys():
        words = []
        qs_indices = qs_labels[label]
        print(qs_indices)
        for i in qs_indices:
            for word in split_qs[i]:
                words.append(word)
            

        # split_q_index = split_qs[label]
        # for word in split_q[split_q_index]:
        #     words.append(word)

        #for related_q in qs_labels[label]:
        #    words+=related_q
        trained_labels[label] = Counter(words)
    return trained_labels

def find_label(q,trained_labels):
    q = q.lower()
    q.replace('; ', ' ')
    q.replace(', ', ' ')
    q.replace('_ ', ' ')
    q.replace('( ', ' ')
    q.replace(') ', ' ')
    q.replace('? ', ' ')
    q.replace('   ', ' ')
    q.replace('  ', ' ')
    split_q = q.split(' ')
    label_freq = {
        key:0 for key in trained_labels.keys()
    }
    for word in split_q:
        #for label_index in range(len(trained_labels)):
        for label in trained_labels.keys():
            if word in trained_labels[label].keys():
                label_freq[label]+=trained_labels[label][word]
                # if word in label_freq[label]:
                #     label_freq[label]+=trained_labels[label][word]
                # else:
                #     label_freq[label]=trained_labels[label][word]
    # labels = trained_labels.keys()
    # result = [sorted_label for _, sorted_label in sorted(zip(label_freq, labels))]
    sorted_keys = reversed(sorted(label_freq, key=label_freq.get))
    label_freq_sorted = {}
    for label in sorted_keys:
        label_freq_sorted[label] = label_freq[label]
    return label_freq_sorted


