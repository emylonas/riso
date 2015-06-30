#!/bin/bash

for pdf in *
do
  if [ "$pdf" != "`basename $0`" ]
  then
    newname=`echo -n $pdf | sed -e's/pdf/jpg/' -e's/bdr://'`
    echo `convert -verbose $pdf[0] $newname`
  fi
done
