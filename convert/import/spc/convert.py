#!/usr/bin/env python
# -*- coding: utf-8 -*-

from __future__ import division, absolute_import, unicode_literals, print_function
import argparse
#import os
import spc

def main():
    desc = 'Converts *.spc binary files to text using the spc module'
    parser = argparse.ArgumentParser(description=desc)
    parser.add_argument('spcfile', help='Input .spc file')
    args = parser.parse_args()

    spcfile = args.spcfile
    delim = '\t'

    # process file
    if spcfile.lower().endswith('spc'):
        try:
            print(spcfile, end=' ')
            f = spc.File(spcfile)
            #f.print_metadata()
            print(f.data_txt())
            print('Converted')
        except:
            print('Error during processing')
    else:
        print('Error not spc file')

if __name__ == '__main__':
    main()
